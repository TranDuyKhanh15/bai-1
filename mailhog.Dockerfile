
FROM golang:alpine

RUN apk --no-cache add \
    ca-certificates

RUN adduser -D -u 1000 mailhog

RUN curl -sfL https://raw.githubusercontent.com/golangci/golangci-lint/master/install.sh| sh -s -- -b $(go env GOPATH)/bin v1.20.0
ENV PATH /usr/local/go/bin:$PATH
# RUN go get github.com/mailhog/mhsendmail
# RUN cp /root/go/bin/mhsendmail /usr/bin/mhsendmail
# RUN echo 'sendmail_path = /usr/bin/mhsendmail --smtp-addr mailhog:1025' > /usr/local/etc/php/php.ini

RUN wget https://github.com/mailhog/mhsendmail/releases/download/v0.2.0/mhsendmail_linux_amd64
RUN chmod +x mhsendmail_linux_amd64
RUN mv mhsendmail_linux_amd64 /usr/local/bin/mhsendmail

RUN apk --no-cache add --virtual build-dependencies \
    go \
    git \
  && mkdir -p /root/gocode \
  && export GOPATH=/root/gocode \
  && go get github.com/mailhog/MailHog \
  && mv /root/gocode/bin/MailHog /usr/local/bin \
  && rm -rf /root/gocode \
  && apk del --purge build-dependencies

USER mailhog

WORKDIR /home/mailhog

ENTRYPOINT ["MailHog"]

EXPOSE 1025 8025