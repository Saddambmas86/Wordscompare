const fs = require('fs');
const path = require('path');

const toolsDir = 'views/tools';
const files = fs.readdirSync(toolsDir).filter(f => f.endsWith('.php'));

let weakTitle = 0, weakDesc = 0;

for (const file of files) {
    const code = fs.readFileSync(path.join(toolsDir, file), 'utf8');
    const t = (code.match(/\$page_title\s*=\s*(["'])(.*?)\1/is) || [])[2] || '';
    const d = (code.match(/\$page_description\s*=\s*(["'])(.*?)\1/is) || [])[2] || '';

    if (!t || t.length < 20) { console.log('WEAK TITLE: ' + file + ' | ' + t); weakTitle++; }
    if (!d || d.length < 60) { console.log('WEAK DESC: ' + file + ' | ' + d); weakDesc++; }
}

console.log('\nSummary:');
console.log('  Files with weak/missing titles: ' + weakTitle);
console.log('  Files with weak/missing descriptions: ' + weakDesc);
console.log('  Total tool files: ' + files.length);
