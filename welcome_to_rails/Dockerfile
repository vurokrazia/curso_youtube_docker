 # Image base
FROM ruby:2.7.1
# Install image dependencies
RUN curl https://deb.nodesource.com/setup_12.x | bash
RUN curl https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add -
RUN echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list
RUN apt-get update && apt-get install -y \
  build-essential \
  nodejs \
  yarn
# Create folder
RUN mkdir -p /home/app
# Asigned folder for work
WORKDIR /home/app
# Copy files of project
COPY ./Gemfile ./
COPY ./Gemfile.lock ./
# Install dependencies of project
RUN gem install bundler && bundle install --jobs 20 --retry 5
# Copy the main application.
COPY ./ ./
# expose port
EXPOSE 3000
# Install yarn dependencies 
RUN yarn install --check-files
# Run server
CMD [ "rails", "s", "-b", "0.0.0.0"]