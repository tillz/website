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
