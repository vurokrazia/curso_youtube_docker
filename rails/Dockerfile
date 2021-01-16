FROM ruby:2.5.1

RUN apt-get update && apt-get install -y \
  build-essential \
  nodejs \
  mysql-server -f
RUN gem install rails 
RUN mkdir -p /home/app
WORKDIR /home/app

CMD bash