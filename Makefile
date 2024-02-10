.PHONY: help
help: ## ヘルプを表示します。
	@grep -E '^[a-zA-Z._-]+:.*?## .*$$' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'


.PHONY: init
init: ## プロジェクトの初期設定を行います。
	@make build
	@make up
	@make composer.install
	cp .env.example .env
	docker compose exec php php artisan key:generate --ansi


.PHONY: build
build: ## サービスをビルドします。
	docker compose build

.PHONY: build.force
build.force: ## サービスをキャッシュを使用せずにビルドします。
	docker compose build --no-cache --force-rm

.PHONY: up
up: ## コンテナをバックグラウンドで立ち上げます。
	docker compose up -d

.PHONY: down
down: ## コンテナを停止して削除します。
	docker compose down

.PHONY: ps
ps: ## コンテナの一覧を表示します。
	docker compose ps

.PHONY: logs
logs: ## コンテナのログを逐次表示します。
	docker compose logs -f


.PHONY: composer.install
composer.install: ## `composer install` を実行します。
	docker compose exec php composer install
