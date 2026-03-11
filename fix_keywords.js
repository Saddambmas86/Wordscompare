const fs = require('fs');
const path = require('path');

const toolsDir = 'views/tools';
const files = fs.readdirSync(toolsDir).filter(f => f.endsWith('.php'));

let fixedCount = 0;

for (const file of files) {
    const filePath = path.join(toolsDir, file);
    let code = fs.readFileSync(filePath, 'utf8');

    if (code.includes('$page_keywords = "$kw";')) {
        // Extract title to generate keywords
        const titleMatch = code.match(/\$page_title\s*=\s*(["'])(.*?)\1/is);
        const title = titleMatch ? titleMatch[2] : '';
        
        let keywords = '';
        if (title) {
            // Simple keyword generation: take words from title, remove " - WordsCompare", remove common stop words
            let cleanTitle = title.replace(/ - WordsCompare/i, '').replace(/Online Free/i, '').trim();
            let words = cleanTitle.split(/\s+/).filter(w => w.length > 2);
            
            // Add some variants
            keywords = [
                cleanTitle,
                ...words,
                'free online tools',
                'PDF tools'
            ].join(', ').toLowerCase();
            
            // Limit to roughly 10 keywords
            keywords = Array.from(new Set(keywords.split(', '))).slice(0, 10).join(', ');
        } else {
            keywords = 'free online tools, PDF tools, WordsCompare';
        }

        const newCode = code.replace(/\$page_keywords\s*=\s*"\$kw";/g, `$page_keywords = "${keywords}";`);
        
        if (newCode !== code) {
            fs.writeFileSync(filePath, newCode);
            fixedCount++;
        }
    }
}

console.log('Successfully fixed keywords in ' + fixedCount + ' tool files.');
