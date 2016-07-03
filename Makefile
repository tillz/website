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

sync:
	@ rm -rf ./data/documentation/*
	@ cp -R ~/Devel/apps/kanboard/doc/*.markdown ./data/documentation/
	@ cp -R ~/Devel/apps/kanboard/doc/screenshots ./screenshots/documentation/

serve:
	@ rm -f data/cache/*
	@ php -S 127.0.0.1:9000 index.php

sign:
	@ gpg -u 894226ED --armor --detach-sign kanboard-${version}.zip

all:
	sync
