FROM mysql/mysql-server:8.0

ENV MYSQL_DATABASE=collect_rent \
  MYSQL_USER=collecter \
  MYSQL_PASSWORD=collect \
  MYSQL_ROOT_PASSWORD=secret \
  TZ=Asia/Tokyo

COPY ./my.cnf /etc/my.cnf
RUN chmod 644 /etc/my.cnf