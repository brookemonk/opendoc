function copyToClipboard() {
    // Sélectionne le texte à copier
    const textToCopy = document.getElementById('textToCopy');
    const range = document.createRange();
    range.selectNode(textToCopy);
    window.getSelection().removeAllRanges();
    window.getSelection().addRange(range);

    // Copie le texte sélectionné dans le presse-papiers
    document.execCommand('copy');

    // Désélectionne le texte après la copie
    window.getSelection().removeAllRanges();

    // Animation de changement d'échelle (scale)
    textToCopy.style.transform = 'scale(1.1)';
    setTimeout(() => {
        textToCopy.style.transform = 'scale(1)';
    }, 200); // 300 millisecondes correspond à la durée de l'animation
}