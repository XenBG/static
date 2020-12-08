We're using `Jigsaw` (https://jigsaw.tighten.co/docs/installation/) to build this website.

## Installation

1. `composer install`
2. `npm install`

## Build for local use

1. `npm run dev` or `./vendor/bin/jigsaw build` to compile all assets and have them in `build_local` folder.
2. `npm run watch` to watch all assets through BrowserSync (this will open `http://localhost:3000` page).
3. `./vendor/bin/jigsaw serve` to run your local server and be accesed through `http://localhost:8000`.

## Build for production use

1. `./vendor/bin/jigsaw build production`
2. Just copy the files inside your `build_production` folder and upload them to the web server.
