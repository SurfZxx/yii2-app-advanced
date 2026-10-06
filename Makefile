.PHONY: up up-d init lint migrate stop destroy

up: ## Start the environment
	docker compose up

up-d: ## Start the environment in detached mode
	docker compose up -d

init: ## Initialize the environment
	docker compose up -d
	docker compose exec backend composer install
	docker compose exec frontend composer install
	docker compose exec backend bash -lc 'php init --env=docker --overwrite=All'
	docker compose exec backend php yii key:generate
	docker compose exec backend php yii migrate

lint: ## Run code linting
	docker compose exec backend ./vendor/bin/phpcs --standard=PSR12 backend

migrate: ## Run database migrations
	docker compose exec backend php yii migrate

stop: ## Stop the environment
	docker compose stop

destroy: ## Stop and remove the environment
	docker compose down --rmi local --volumes --remove-orphans