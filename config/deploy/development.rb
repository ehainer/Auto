set :deploy_to, "/web/magento/restomotive.com"
set :branch, "development"

server "restomotive.minow.io", user: "magento", port: "1022", roles: %w{web app}, primary: true