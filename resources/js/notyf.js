import {Notyf} from 'notyf';

let notyf = null;

if (kapouet.notyf.messages.length) {
    if (notyf === null) {
        notyf = new Notyf(kapouet.notyf.config);
    }

    kapouet.notyf.messages.forEach(function ({type, message}) {
        notyf.open({type, message});
    });
}

if (typeof Livewire !== 'undefined') {
    if (notyf === null) {
        notyf = new Notyf(kapouet.notyf.config);
    }

    Livewire.on('kapouet.notyf.message', function ({type, message}) {
        notyf.open({type, message});
    });
}
