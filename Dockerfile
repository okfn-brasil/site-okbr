FROM wordpress:6.7-php8.2-apache

# Move custom plugins bundled in this repo to the WordPress plugins directory.
# The plugins/ directory inside the theme is a deviation from WP conventions —
# this step corrects the layout at build time.
COPY plugins/ /var/www/html/wp-content/plugins/

# Copy the theme itself (everything except plugins/, k8s/, .github/, .git/).
# .dockerignore excludes the directories above at build context level.
COPY . /var/www/html/wp-content/themes/site-okbr/

# Remove the plugins copy that ended up inside the theme directory.
RUN rm -rf /var/www/html/wp-content/themes/site-okbr/plugins \
    && chown -R www-data:www-data \
         /var/www/html/wp-content/themes/site-okbr \
         /var/www/html/wp-content/plugins
