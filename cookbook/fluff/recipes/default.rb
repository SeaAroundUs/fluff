# Cookbook Name:: fluff
# Recipe:: default
# Copyright 2015, Vulcan Technologies
# All rights reserved - Do Not Redistribute

include_recipe 'apt'

package 'build-essential vim curl libmysql-ruby libmysqlclient-dev'

include_recipe 'fluff::php'

cookbook_file 'seadb_dump.sql' do
  path '/tmp/seadb_dump.sql'
  action :create
end

mysql_service 'fluff' do
  initial_root_password 'password'
  action [ :create, :start ]
end

mysql_client 'default' do
  action :create
end

mysql2_chef_gem 'default' do
  action :install
end

include_recipe 'fluff::db'
include_recipe 'fluff::nginx'
