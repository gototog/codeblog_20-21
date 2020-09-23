FROM kibatic/symfony:7.4 as base

RUN apt-get -qqq update && DEBIAN_FRONTEND=noninteractive apt-get install -qqq -y \
        vim \
        make \
        openssl \
        curl \
        git \
        gnupg2 \
        build-essential xorg libssl-dev libxrender-dev \
        php7.4-curl \
        php7.4-zip \
        php7.4-mysql \
        php7.4-pgsql && \
        apt-get clean && \
        rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

ADD docker/rootfs /

ADD . /var/www

FROM base as dev

RUN apt-get -qqq update && DEBIAN_FRONTEND=noninteractive apt-get install -qqq -y \
        php7.4-xdebug && \
        apt-get clean && \
        rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN curl -sS https://get.symfony.com/cli/installer | bash
RUN mv /root/.symfony/bin/symfony /usr/local/bin/symfony

# NodeJs
RUN apt-get -qqq update && apt-get install -qqq -y gnupg2 && \
    curl -sL https://deb.nodesource.com/setup_12.x | bash - && \
    DEBIAN_FRONTEND=noninteractive apt-get install -qqq -y nodejs && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Yarn
RUN  curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add - && \
     echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list && \
     apt-get -qqq update && apt-get install -qqq -y yarn  && \
     apt-get clean && \
     rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

ADD docker/rootfs_dev /

RUN git config --global user.email "dev@localhost"
RUN git config --global user.name "dev"
