# Sea Around Us Project - WordPress Fluff

### Developer Setup
- Have [Vagrant](http://www.vagrantup.com/), [VirtualBox](https://www.virtualbox.org/), and [ChefDK](https://downloads.chef.io/chef-dk/) installed
- `$ vagrant plugin install vagrant-berkshelf` to get the needed plugin
- Add `192.168.0.44 wordpress.dev` to your `/etc/hosts` file
- Clone this repo
- `$ vagrant up` in the repo dir
- Local development environment: http://wordpress.dev
- To enable email sending, create `/var/www/.aws/credentials` with the following (fill in your AWS credentials):
```
[sea-around-us]
aws_access_key_id = YOUR_AWS_ACCESS_KEY_ID
aws_secret_access_key = YOUR_AWS_SECRET_ACCESS_KEY
```
-just to trigger new build
