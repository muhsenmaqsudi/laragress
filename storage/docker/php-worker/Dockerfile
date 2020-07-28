FROM muhsenmaqsudi/laradvance

RUN apt-get update && \
    apt-get install -y supervisor

COPY supervisord.conf /etc/supervisor/
COPY supervisord.d /etc/supervisor/conf.d/

ENTRYPOINT ["/usr/bin/supervisord", "-n", "-c",  "/etc/supervisor/supervisord.conf"]

WORKDIR /etc/supervisor/conf.d/
