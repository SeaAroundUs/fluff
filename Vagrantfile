# -*- mode: ruby -*-
# vi: set ft=ruby :

API_VERSION = '2'
VM_NAME = 'fluff'

Vagrant.configure(API_VERSION) do |config|

  # vagrant setup
  config.vm.box = 'hashicorp/precise64'
  config.vm.network :private_network, ip: '192.168.0.44'
  config.vm.synced_folder '.', '/vagrant', mount_options: [ 'dmode=777', 'fmode=666' ]

  # virtualbox setup
  config.vm.define VM_NAME
  config.vm.provider :virtualbox do |vb|
    vb.name = VM_NAME
    vb.memory = 1024
  end

  # 'stdin: is not a tty' fix
  ssh_fix = 'bash -c "BASH_ENV=/etc/profile exec bash"'
  config.ssh.shell = ssh_fix unless ARGV[0] == 'ssh'

  # plugins
  config.berkshelf.enabled = true

  # chef provision
  config.vm.provision :chef_solo do |chef|
    chef.add_recipe 'fluff'
  end
end
