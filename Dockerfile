FROM wordpress:php8.4-apache

# Custom PHP limits for WordPress & large plugins (WooCommerce, Jetpack, ACF, etc.)
RUN { \
    echo 'memory_limit = 512M'; \
    echo 'max_execution_time = 300'; \
    echo 'upload_max_filesize = 128M'; \
    echo 'post_max_size = 128M'; \
    echo 'max_input_time = 300'; \
} > /usr/local/etc/php/conf.d/custom-limits.ini

# Tuned Apache MPM Prefork configuration (reduces memory consumption to ~250MB & recycles workers)
RUN { \
    echo '<IfModule mpm_prefork_module>'; \
    echo '    StartServers             2'; \
    echo '    MinSpareServers          2'; \
    echo '    MaxSpareServers          4'; \
    echo '    MaxRequestWorkers        8'; \
    echo '    MaxConnectionsPerChild   300'; \
    echo '</IfModule>'; \
} > /etc/apache2/mods-available/mpm_prefork.conf

# Move custom plugins bundled in this repo to the WordPress plugins directory.
# The plugins/ directory inside the theme is a deviation from WP conventions —
# this step corrects the layout at build time.
COPY plugins/ /var/www/html/wp-content/plugins/

# Copy the theme itself (everything except plugins/, k8s/, .github/, .git/).
# .dockerignore excludes the directories above at build context level.
COPY . /var/www/html/wp-content/themes/site-okbr/

# Remove redundant plugins copy inside theme and symlink to wp-content/plugins for compatibility.
RUN rm -rf /var/www/html/wp-content/themes/site-okbr/plugins \
    && ln -sf /var/www/html/wp-content/plugins /var/www/html/wp-content/themes/site-okbr/plugins \
    && chown -R www-data:www-data \
         /var/www/html/wp-content/themes/site-okbr \
         /var/www/html/wp-content/plugins

