# TOCO
TOCO is a web application designed to help users learn a new language . With TOCO, users can choose from a variety of languages and skill levels, and then work through a series of lessons to improve their vocabulary, grammar, and pronunciation. Users can track their progress over time. Whether you're a beginner or an advanced learner, TOCO is the perfect tool to help you master a new language.

## Requirement
- Docker

## Installation
1. Clone this repository
2. make sure that the docker engine is up and running
3. run `docker-compose up`
4. enjoy at `localhost:8008`

## screenshots
- homepage
![homepage](img/homepage-guest.png)
- login
  ![login](img/login.png)
- register
  ![register](img/register.png)
- choose language
    ![choose language](img/learning.png)
- choose module
  ![lesson](img/module.png)
- video
  ![video](img/video.png)
- admin dashboard
  ![admin dashboard](img/admin-dashboard.png)
- edit module
  ![edit module](img/edit-module.png)
- edit lesson
  ![edit lesson](img/edit-module-vid.png)
- edit video
  ![edit video](img/edit-video.png)


## Pembagian Tugas
### _Server Side_

| Fitur                    | NIM      |
| ------------------------ | -------- |
| Login                    |  13521021|
| Register                 |  13521021        |
| Search                   | 13521019 |
| Sort dan Filter          |  13521019 |
| Daftar Bahasa            | 13521019,13521021, 13521022  |
| Tambah Bahasa             | 13521021, 13521022 |
| Edit Bahasa             | 13521021, 13521022 |
| Daftar Modul              |13521021, 13521022 |
| Tambah Modul             | 13521021|
| Edit Modul             | 13521021|
| Daftar Video|  13521021, 13521022|
| Tambah Video             | 13521021 |
| Edit Video            | 13521021 |
| Profile             | 13521021 |
| Pagination               | 13521019         |

### _Client Side_

| Page                     | NIM      |
| ------------------------ | -------- |
| Login                    | 13521021         |
| Register                 | 13521021         |
| Profile                     |     13521021     |
| Home                     | 13521019, 13521021 |
| My Learning              | 13521021 |
| Pilih Bahasa              | 13521021 |
| Daftar Modul              | 13521019 |
| Video              | 13521022 |
| Admin Dashboard           | 13521019 |
| Admin Daftar Bahasa              | 13521019 |
| Admin Tambah Bahasa              | 13521019, 13521022 |
| Admin Edit Bahasa              | 13521019 |
| Admin Daftar Modul              | 13521019 |
| Admin Tambah Modul              | 13521019, 13521022 |
| Admin Edit Modul              | 13521019 |
| Admin Daftar Video              | 13521019 |
| Admin Tambah Video              | 13521019, 13521022 |
| Admin Edit Video              | 13521019 |
| 404             | 13521021 |

| Component                | NIM      |
| ------------------------ | -------- |
| Navigation Bar           |  13521021|
| Footer               | 13521019 |
| Toast               | 13521019 |
| Modal               | 13521019 |

### _Database_

| Fitur                    | NIM      |
| ------------------------ | -------- |
| Users                    | 13521021         |
| Languages                     | 13521021 |
| Modules                    | 13521021 |
| Videos                    | 13521021 |
| Progress                    | 13521021,13521022 |
| Modules_result                    | 13521021 |
| Videos_result                    | 13521021 |

### _Setup_

| Setup                    | NIM      |
| ------------------------ | -------- |
| Database                 |     13521019, 13521021, 13521022     |
| Docker                   |       13521021   |
| MVC                      |  13521019, 13521021, 13521022|

## Bonus
- [x] Responsive Design
- Mobile
- Tablet
- Laptop
- Desktop
- [x] Docker
- [x] Google Lighthouse
- Performance 94%
- Accessibility 96%
- Best Practices 100%
- SEO 91%
! [lighthouse](img/lighthouse.png)
 

## Repository Tree
```
.
|____.DS_Store
|____app
| |____init.php
| |____core
| | |____Controller.php
| | |____App.php
| | |____Database.php
| |____models
| | |____ModuleModel.php
| | |____ProgressModel.php
| | |____LanguageModel.php
| | |____UserModel.php
| | |____VideoModel.php
| |____controllers
| | |____MyLearning.php
| | |____Login.php
| | |____Register.php
| | |____Home.php
| | |____Error404.php
| | |____Learn.php
| | |____Profile.php
| | |____Admin.php
| |____views
| | |____home
| | | |____index.php
| | |____navbar
| | | |____index.php
| | |____footer
| | | |____index.php
| | |____video
| | | |____index.php
| | |____learn
| | | |____index.php
| | |____toast
| | | |____index.php
| | |____admin
| | | |____module
| | | | |____index.php
| | | |____language
| | | | |____index.php
| | | |____dashboard
| | | | |____index.php
| | | |____edit
| | | | |____video
| | | | | |____index.php
| | | | |____module
| | | | | |____index.php
| | | | |____language
| | | | | |____index.php
| | | |____manage
| | | | |____index.php
| | | |____create
| | | | |____video
| | | | | |____index.php
| | | | |____module
| | | | | |____index.php
| | | | |____language
| | | | | |____index.php
| | |____mylearning
| | | |____index.php
| | |____register
| | | |____index.php
| | |____Error404
| | | |____index.php
| | |____profile
| | | |____index.php
| | |____lesson
| | | |____index.php
| | |____login
| | | |____index.php
| | |____header
| | | |____index.php
|____index.php
|____config
| |____dotenv.php
| |____config.php
| |____.env
|____Dockerfile
|____README.md
|____img
| |____learning.png
| |____login.png
| |____homepage-user.png
| |____register.png
| |____admin-dashboard.png
| |____edit-module-vid.png
| |____homepage-guest.png
| |____edit-video.png
| |____module.png
| |____my-learning.png
| |____video.png
| |____profile.png
| |____edit-module.png
| |____edit-language.png
|____public
| |____video
| | |____default.mp4
| |____css
| | |____register.css
| | |____home.css
| | |____create.css
| | |____lesson.css
| | |____mylearning.css
| | |____global.css
| | |____login.css
| | |____dashboard.css
| | |____navbar.css
| | |____modal.css
| | |____toast.css
| | |____admin-global.css
| | |____manage.css
| | |____error.css
| | |____video.css
| | |____footer.css
| | |____learn.css
| | |____profile.css
| |____images
| | |____about-image.png
| | |____banner-image.png
| | |____tuco-artwork.png
| | |____feature-1.png
| | |____feature-3.png
| | |____feature-2.png
| |____js
| | |____profile.js
| | |____navbar.js
| | |____create-language.js
| | |____create-video.js
| | |____module-card.js
| | |____register.js
| | |____edit-video.js
| | |____create-module.js
| | |____search-filter-sort.js
| | |____manage-search.js
| | |____edit-module.js
| | |____edit-language.js
| | |____modal.js
| | |____toast.js
| |____icons
| | |____earth.svg
| | |____logo.ico
| | |____checked.svg
| | |____profile.webp
| | |____youtube_icon.svg
| | |____instagram_icon.svg
| | |____trophy.svg
| | |____gr-flag.svg
| | |____search-icon.svg
| | |____twitter_icon.svg
| | |____uk-flag.svg
| | |____fr-flag.svg
| | |____facebook_icon.svg
| | |____id-flag.svg
| | |____logo.svg
| |____imgdata
| | |____video
| | | |____LearnPronounsInEnglish.mp4
| | | |____y2mate.is - Demo Background Sample Video-K4TOrB7at0Y-144pp-1696607692.mp4
| | | |____ReadingBigNumbersInEnglish.mp4
| | | |____LearnGreetingsInEnglish.mp4
| | | |____How to introduce yourself in Indonesian.mp4
| | | |____10 basic phrases for your first conversation.mp4
| | | |____y2mate.is - Video lucu singkat.untuk story wa-zciZMLEcjKo-144pp-1696606985.mp4
| | | |____Top 25 Indonesian Phrases.mp4
| | | |____LearnEnglishNumbers1-100.mp4
| | | |____100MostPopularEnglishGirlsNames.mp4
| | | |____NumberSong1-20.mp4
| | |____language
| | | |____tuco-artwork.png
| | | |____gr-flag.svg
| | | |____4613FDB6-FFAB-4661-ABFF-B398BA5DC19C.jpg
| | | |____uk-flag.svg
| | | |____fr-flag.svg
| | | |____id-flag.svg
| | |____profile
| | | |____Vector.svg
| | | |____tuco-artwork.png
| | | |____gr-flag.svg
| | | |____uk-flag.svg
| | | |____Tabel skala major.png
| | | |____fr-flag.svg
|____scripts
| |____build-image.sh
|____db
| |____.DS_Store
| |____toco.sql
|____api
| |____auth
| | |____login.php
| | |____register.php
| | |____logout.php
| | |____profile.php
| | |____image.php
| |____admin
| | |____languageImage.php
| | |____editLanguage.php
| | |____editModule.php
| | |____editVideo.php
| | |____module.php
| | |____video.php
| | |____language.php
| | |____moduleVideo.php
| |____main
| | |____addProgress.php
| | |____addFinished.php
|____docker-compose.yml
```

