# -*- mode: ruby -*-
# vi: set ft=ruby :

API_VERSION = '2'
VM_NAME = 'fluff'

Vagrant.configure(API_VERSION) do |config|

  # vagrant setup
  config.vm.box = 'hashicorp/precise64'
  config.vm.network :private_network, ip: '192.168.0.44'
  #config.vm.network :forwarded_port, guest: 80, host: 8080

  # virtualbox setup
  config.vm.define VM_NAME
  config.vm.provider :virtualbox do |vb|
    vb.name = VM_NAME
  end

  # 'stdin: is not a tty' fix
  ssh_fix = 'bash -c "BASH_ENV=/etc/profile exec bash"'
  config.ssh.shell = ssh_fix unless ARGV[0] == 'ssh'

  # plugins
  config.omnibus.chef_version = :latest
  config.berkshelf.enabled = true

  # chef provision
  config.vm.provision :chef_solo do |chef|
    chef.add_recipe 'fluff'
  end
end
