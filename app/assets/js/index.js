import turbolinks from 'turbolinks';
import jQuery from 'jquery';
import 'popper.js';
import 'bootstrap';
import '../scss/index.scss';

function load() {
  if (window.ready) {
    window.ready();

    window.ready = null;
  }
}

window.$ = jQuery;
turbolinks.start();
document.addEventListener('turbolinks:load', load);
window.onload = load;
