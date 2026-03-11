const fs = require('fs');
const path = require('path');
const dir = 'views/tools';
const files = fs.readdirSync(dir).filter(f => f.endsWith('.php'));
const bad = [];
for (const file of files) {
    const code = fs.readFileSync(path.join(dir, file), 'utf8');
    const m = code.match(/\$page_description\s*=\s*(["'])(.*?)\1/is);
    const desc = m ? m[2] : '';
    if (!desc || desc.length < 60) {
        bad.push(file + ' | ' + desc);
    }
}
bad.forEach(b => console.log(b));
console.log('Total with weak/missing desc: ' + bad.length);
