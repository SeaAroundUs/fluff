# Cookbook Name:: fluff
# Recipe:: nginx
# Copyright 2015, Vulcan Technologies
# All rights reserved - Do Not Redistribute

include_recipe 'nginx'

cookbook_file 'wordpress' do
  path '/etc/nginx/sites-available/wordpress'
  action :create
  notifies :restart, 'service[nginx]', :delayed
end

nginx_site 'wordpress' do
  enable true
  notifies :restart, 'service[nginx]', :delayed
end
