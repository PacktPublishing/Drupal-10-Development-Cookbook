module.exports = (inputText) => {
  let text = inputText.toLowerCase();
  text = text.replace(/[, -]/g, '_');

  let extractedText = text.split('_').map(function(word, index) {
    if (index !== 0) {
      return word.charAt(0).toUpperCase() + word.slice(1).toLowerCase();
    } else {
      text = word;
    }
  }).join('');

  text = text.toLowerCase() + extractedText;
  return text.replace('_', '');
}

