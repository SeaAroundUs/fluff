# Cookbook Name:: fluff
# Recipe:: db
# Copyright 2015, Vulcan Technologies
# All rights reserved - Do Not Redistribute

mysql_connection_info = { host: '127.0.0.1', username: 'root', password: 'password' }

mysql_database 'seadb' do
  connection mysql_connection_info
  action [ :drop, :create ]
end

mysql_database_user 'wpworker' do
  connection mysql_connection_info
  password 'w2009rks'
  database_name 'seadb'
  host '%'
  action :create
end

mysql_database_user 'wpworker' do
  connection mysql_connection_info
  password 'w2009rks'
  database_name 'seadb'
  host '%'
  privileges [ :all ]
  action :grant
end

execute 'mysql_dump' do
  command 'mysql -h127.0.0.1 -uroot -ppassword < /tmp/seadb_dump.sql'
end
