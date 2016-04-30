sync:
	@ rm -rf ./data/documentation/*
	@ cp -R ~/Devel/apps/kanboard/doc/*.markdown ./data/documentation/
	@ cp -R ~/Devel/apps/kanboard/doc/screenshots ./screenshots/documentation/

serve:
	@ rm -f data/cache/*
	@ php -S 127.0.0.1:9000 index.php

all:
	sync
