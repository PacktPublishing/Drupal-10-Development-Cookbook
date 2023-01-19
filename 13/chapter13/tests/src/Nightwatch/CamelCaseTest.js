const assert = require('assert');
const camelCase = require('../../../js/camelCase');

const dataProvider = [
  {input: 'button_color', expected: 'buttonColor'},
  {input: 'snake_case_example', expected: 'snakeCaseExample'},
  {input: 'ALL_CAPS_LOCK', expected: 'allCapsLock'},
  {input: 'foo-bar', expected: 'fooBar'},
];

module.exports = {
  '@tags': ['chapter13'],
  '@unitTest' : true,
  'Strings are converted to camelCase' : function (done) {
    dataProvider.forEach(function (values) {
      assert.strictEqual(camelCase(values.input), values.expected);
    });
    setTimeout(function() {
      done();
    }, 10);
  }
};
