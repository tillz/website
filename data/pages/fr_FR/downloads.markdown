Title: Télécharger Kanboard
Description: Télécharger la version stable de Kanboard (logiciel libre et open source)
Language: fr_FR
---

Téléchargements
===============

### Version stable

- [kanboard-latest.zip](/kanboard-latest.zip)  ([Signature](/kanboard-latest.zip.asc))

### Version journalière (seulement pour les tests)

- [kanboard-nightly.zip](/kanboard-nightly.zip)

### Dépôt Git (seulement pour le développement)

- [https://github.com/kanboard/kanboard](https://github.com/kanboard/kanboard)

N'oubliez pas de lire les [instructions d'installations](/fr/documentation/installation) et de vérifier les [prérequis](/fr/documentation/requirements).

### Comment vérifier la signature de l'archive

Téléchargez la clé GPG publique :

```
gpg --keyserver hkp://keys.gnupg.net --recv-keys  'DCF1 D3CB C1E4 3342 116F  760E 112C 718C 8942 26ED'
```

La clé publique est également [disponible ici](/gpg/DCF1D3CBC1E43342116F760E112C718C894226ED.asc).

Vérifiez la signature :

```
gpg --verify kanboard-<version>.zip.asc kanboard-<version>.zip
```

### Licence

```
The MIT License (MIT)

Copyright (c) 2014-2016 Frédéric Guillot

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
```
