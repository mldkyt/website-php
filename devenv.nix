{
  pkgs,
  lib,
  config,
  inputs,
  ...
}:

let
  dbHost = "localhost";
  dbUser = "mldkyt";
  dbPassword = "mldkyt";
  dbName = "website";
in
{
  env = {
    DB_POSTGRES_HOST = dbHost;
    DB_POSTGRES_USER = dbUser;
    DB_POSTGRES_PASSWORD = dbPassword;
    DB_POSTGRES_NAME = dbName;
    DATABASE_URL = "postgresql://${dbUser}:${dbPassword}@${dbHost}:5432/${dbName}";
  };

  languages.php = {
    enable = true;
    package = pkgs.php.buildEnv {
      extensions = { all, enabled }: with all; enabled ++ [ pgsql ];
      extraConfig = ''
        include_path = ".:${config.devenv.root}/components"
        display_errors = On
        error_reporting = E_ALL
      '';
    };

    # PHP-FPM pool used by nginx
    fpm.pools.web = {
      settings = {
        "pm" = "dynamic";
        "pm.max_children" = 10;
        "pm.start_servers" = 2;
        "pm.min_spare_servers" = 1;
        "pm.max_spare_servers" = 5;
        "pm.max_requests" = 500;
      };
      # Pass the DB env vars into PHP-FPM workers
      phpEnv = {
        DB_POSTGRES_HOST = dbHost;
        DB_POSTGRES_USER = dbUser;
        DB_POSTGRES_PASSWORD = dbPassword;
        DB_POSTGRES_NAME = dbName;
      };
    };
  };

  services.postgres = {
    enable = true;
    listen_addresses = dbHost;
    initialDatabases = [
      {
        name = dbName;
        user = dbUser;
        pass = dbPassword;
      }
    ];
  };

  services.nginx = {
    enable = true;
    httpConfig = ''
      server {
        listen 8080;
        server_name localhost;
        root ${config.devenv.root}/src;
        index index.php index.html;

        location / {
          try_files $uri $uri/ /index.php?$query_string;
        }

        location ~ \.php$ {
          try_files $uri =404;
          fastcgi_split_path_info ^(.+\.php)(/.+)$;
          fastcgi_pass unix:${config.languages.php.fpm.pools.web.socket};
          fastcgi_index index.php;
          include ${pkgs.nginx}/conf/fastcgi_params;
          fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
          fastcgi_param PATH_INFO $fastcgi_path_info;
        }

        location ~ /\.ht {
          deny all;
        }
      }
    '';
  };

  languages.python = {
    enable = true;
    directory = "./webmigrator";
    version = "3.12";
    uv = {
      enable = true;
      sync.enable = true;
    };
  };

  packages = [pkgs.postgresql.pg_config];

  tasks."web:migrate" = {
    exec = ''
      pushd webmigrator
      uv run alembic upgrade head
      popd
    '';
  };
}
