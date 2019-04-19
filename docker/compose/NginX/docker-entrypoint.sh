#!/bin/bash

# Do not daemonize NginX
test=$(grep -i 'daemon off;' /etc/nginx/nginx.conf)
if [ -z "$test" ]; then
    echo 'daemon off;' >> /etc/nginx/nginx.conf
fi

# Create static virtual host
cat > /etc/nginx/conf.d/static.conf <<- EOF
server {
    listen       80;
    server_name  ${STATIC_VIRTUAL_HOST};

	location / {
        	try_files \$uri \$uri/ /index.php?\$args;
	}

    access_log /var/log/nginx/static-access.log;
    error_log /var/log/nginx/static-error.log;

    # note that these lines are originally from the "location /" block
    root   /home/dataone/public_html/public;
    index index.php index.html index.htm;

    error_page 404 /404.html;
    error_page 500 502 503 504 /50x.html;
    location = /50x.html {
        root /home/dataone/public_html;
    }

    location ~ \.php$ {
        try_files \$uri =404;
        fastcgi_pass dataone_phpfpm:9000;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME \$document_root\$fastcgi_script_name;
        include fastcgi_params;
    }

    # Global restrictions configuration file.
    # Designed to be included in any server {} block.
    location = /favicon.ico {
            log_not_found off;
            access_log off;
    }

    location = /robots.txt {
            allow all;
            log_not_found off;
            access_log off;
    }

    # Deny all attempts to access hidden files such as .htaccess, .htpasswd, .DS_Store (Mac).
    # Keep logging the requests to parse later (or to pass to firewall utilities such as fail2ban)
    location ~ /\. {
            deny all;
    }

    # Deny access to any files with a .php extension in the uploads directory
    # Works in sub-directory installs and also in multisite network
    # Keep logging the requests to parse later (or to pass to firewall utilities such as fail2ban)
    location ~* /(?:uploads|files)/.*\.php$ {
            deny all;
    }
}
EOF

# Create static virtual host
cat > /home/dataone/nginx.conf <<- EOF
location ~ \.php {
     fastcgi_read_timeout 21600;
     try_files \$uri =404;
     fastcgi_split_path_info ^(.+\.php)(/.+)$;
     include fastcgi_params;
     fastcgi_param SCRIPT_FILENAME \$document_root\$fastcgi_script_name;
     fastcgi_param SCRIPT_NAME \$fastcgi_script_name;
     fastcgi_param HTTP_AUTHORIZATION \$http_authorization;
     fastcgi_index index.php;
     fastcgi_pass dataone_phpfpm:9000;
 }

location /import {
     auth_basic "Restricted Content";
     auth_basic_user_file /home/dataone/public_html/public/import/keystore;
}
EOF
cat > /etc/nginx/conf.d/privacy.conf <<- EOF
server {
    listen       80;
    server_name  ${PRIVACY_VIRTUAL_HOST};

	location / {
        	try_files \$uri \$uri/ /index.php?\$args;
	}

    access_log /var/log/nginx/privacy-access.log;
    error_log /var/log/nginx/privacy-error.log;

    # note that these lines are originally from the "location /" block
    root   /home/dataone/public_html/public;
    index index.php index.html index.htm;

    include /home/dataone/nginx.conf;

    error_page 404 /404.html;
    error_page 500 502 503 504 /50x.html;
    location = /50x.html {
        root /home/dataone/public_html/public;
    }

    location ~ \.php$ {
        try_files \$uri =404;
        fastcgi_pass dataone_phpfpm:9000;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME \$document_root\$fastcgi_script_name;
        include fastcgi_params;
    }

    # Global restrictions configuration file.
    # Designed to be included in any server {} block.
    location = /favicon.ico {
            log_not_found off;
            access_log off;
    }

    location = /robots.txt {
            allow all;
            log_not_found off;
            access_log off;
    }

    # Deny all attempts to access hidden files such as .htaccess, .htpasswd, .DS_Store (Mac).
    # Keep logging the requests to parse later (or to pass to firewall utilities such as fail2ban)
    location ~ /\. {
            deny all;
    }

    # Deny access to any files with a .php extension in the uploads directory
    # Works in sub-directory installs and also in multisite network
    # Keep logging the requests to parse later (or to pass to firewall utilities such as fail2ban)
    location ~* /(?:uploads|files)/.*\.php$ {
            deny all;
    }
}
EOF

# Start NginX
exec nginx
