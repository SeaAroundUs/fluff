# Cookbook Name:: fluff
# Recipe:: apache
# Copyright 2015, Vulcan Technologies
# All rights reserved - Do Not Redistribute

include_recipe 'apache2'
include_recipe 'apache2::mod_fastcgi'
include_recipe 'apache2::mod_php5'

web_app 'fluff' do
  server_name 'wordpress.dev'
  docroot '/vagrant/public'
  cookbook 'apache2'
  allow_override 'FileInfo'
  enable true
end
