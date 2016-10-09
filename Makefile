CONTAINER = kanboard-website
IMAGE = kanboard/website
TAG = latest

docker-image:
	@ docker build -t $(IMAGE):$(TAG) .

docker-push:
	@ docker push $(IMAGE)

docker-destroy:
	@ docker rmi $(IMAGE)

docker-run:
	@ docker run --name $(CONTAINER) -P -e APP_VERSION=TESTING $(IMAGE):$(TAG)

docker-stop:
	@ docker rm -f $(CONTAINER)

docs:
	@ rm -rf ./data/documentation
	@ rm -rf ./screenshots/documentation
	@ mkdir -p ./data/documentation/{fr_FR,en_US}
	@ mkdir -p ./screenshots/documentation/{fr_FR,en_US}/
	@ cp -R ~/Devel/apps/kanboard/doc/*.markdown ./data/documentation/en_US/
	@ cp -R ~/Devel/apps/kanboard/doc/fr_FR/*.markdown ./data/documentation/fr_FR/
	@ cp -R ~/Devel/apps/kanboard/doc/screenshots ./screenshots/documentation/en_US/
	@ cp -R ~/Devel/apps/kanboard/doc/fr_FR/screenshots ./screenshots/documentation/fr_FR/

serve:
	@ rm -f data/cache/*
	@ php -S 127.0.0.1:9000 index.php

sign:
	@ gpg -u 894226ED --armor --detach-sign kanboard-${version}.zip
