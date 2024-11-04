document.addEventListener('DOMContentLoaded', function() {
    const successMessage = document.querySelector('meta[name="session-success"]')?.getAttribute('content');
    const errorMessage = document.querySelector('meta[name="session-error"]')?.getAttribute('content');
    const warningMessage = document.querySelector('meta[name="session-warning"]')?.getAttribute('content');
    const infoMessage = document.querySelector('meta[name="session-info"]')?.getAttribute('content');

    if (successMessage) {
        window.dispatchEvent(new CustomEvent('notify', {
            detail: {
                message: successMessage,
                type: "success"
            }
        }));
    }

    if (errorMessage) {
        window.dispatchEvent(new CustomEvent('notify', {
            detail: {
                message: errorMessage,
                type: "error"
            }
        }));
    }

    if (warningMessage) {
        window.dispatchEvent(new CustomEvent('notify', {
            detail: {
                message: warningMessage,
                type: "warning"
            }
        }));
    }

    if (infoMessage) {
        window.dispatchEvent(new CustomEvent('notify', {
            detail: {
                message: infoMessage,
                type: "info"
            }
        }));
    }
});