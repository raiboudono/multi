
FROM mysql:8.0

RUN set -eux \
    && apt-get update \
    && apt-get install -y \
    locales \
    && localedef -f UTF-8 -i ja_JP ja_JP \
    && rm -rf /var/lib/apt/lists/*

ENV TZ=Asia/Tokyo \
    LANG=ja_JP.UTF-8 \
    LANGUAGE=ja_JP:ja \
    LC_ALL=ja_JP.UTF-8 \
    MYSQL_DATABASE=mydb \
    MYSQL_USER=sampleman \
    MYSQL_PASSWORD=sample \
    MYSQL_ROOT_PASSWORD=sample

COPY ./my.cnf /etc/my.cnf