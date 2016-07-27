lock '3.6.0'

set :application, "Auto"
set :repo_url, "git@github.com:ehainer/Auto.git"
set :deploy_to, '/var/web/magento/auto.com'

set :ssh_options, {
	forward_agent: true,
	port: 22,
	keepalive: true,
	keepalive_interval: 60
}

set :pty, true

set :linked_dirs, fetch(:linked_dirs, []).push("var", "media", "sitemaps")
set :linked_files, fetch(:linked_files, []).push("app/etc/local.xml", "config/app.json")
