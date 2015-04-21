# Cookbook Name:: fluff
# Recipe:: php
# Copyright 2015, Vulcan Technologies
# All rights reserved - Do Not Redistribute

service 'php5-fpm' do
  supports :restart => true, :start => true, :stop => true
  action :nothing
end

package 'php5-cli php5-fpm php5-mysql php5-curl' do
  action :install
  notifies :restart, 'service[php5-fpm]', :delayed
end
