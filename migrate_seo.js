const fs = require('fs');
const path = require('path');

const contentDir = path.join(__dirname, 'views', 'content');
const toolsDir = path.join(__dirname, 'views', 'tools');

const contentFiles = fs.readdirSync(contentDir).filter(f => f.endsWith('-content.php'));

let modifiedCount = 0;

for (const contentFile of contentFiles) {
    const featureName = contentFile.replace('-content.php', '');
    const toolFile = path.join(toolsDir, `${featureName}.php`);
    
    if (!fs.existsSync(toolFile)) continue;
    
    let contentCode = fs.readFileSync(path.join(contentDir, contentFile), 'utf8');
    let toolCode = fs.readFileSync(toolFile, 'utf8');

    const titleMatch = contentCode.match(/<title>(.*?)<\/title>/is);
    const descMatch = contentCode.match(/<meta[^>]*name=["']description["'][^>]*content=["'](.*?)["']/is);
    const kwMatch = contentCode.match(/<meta[^>]*name=["']keywords["'][^>]*content=["'](.*?)["']/is);
    
    let title = titleMatch ? titleMatch[1].trim() : '';
    let desc = descMatch ? descMatch[1].trim() : '';
    let kw = kwMatch ? kwMatch[1].trim() : '';

    if (!title && !desc) continue;

    // Update tool file
    let newToolCode = toolCode;
    
    if (title) {
        newToolCode = newToolCode.replace(/(\$page_title\s*=\s*)(["'])(.*?)\2/is, `$1"$title"`);
    } else {
        // If we didn't find a title in content, what does the tool file already have?
        title = (toolCode.match(/\$page_title\s*=\s*(["'])(.*?)\1/is) || [])[2] || '';
    }

    if (desc) {
        // Find $page_description = "..." and replace it
        newToolCode = newToolCode.replace(/(\$page_description\s*=\s*)(["'])(.*?)\2/is, `$1"$desc"`);
    } else {
        desc = (toolCode.match(/\$page_description\s*=\s*(["'])(.*?)\1/is) || [])[2] || '';
    }

    if (kw) {
        newToolCode = newToolCode.replace(/(\$page_keywords\s*=\s*)(["'])(.*?)\2/is, `$1"$kw"`);
    }

    // Now clean up the contentFile
    // Remove everything from <!DOCTYPE html> down to <body> inclusive
    let newContentCode = contentCode.replace(/<!DOCTYPE html>.*?<body>\s*/is, '');
    
    // Also remove the closing </body> and </html> at the end
    newContentCode = newContentCode.replace(/<\/body>\s*<\/html>\s*$/is, '');

    // Sometimes they put bootstrap stylesheets and fa-icons inside the head
    // which shouldn't be loaded twice, but they are gone with the above regex.

    fs.writeFileSync(toolFile, newToolCode);
    fs.writeFileSync(path.join(contentDir, contentFile), newContentCode);
    modifiedCount++;
}

console.log(`Successfully migrated SEO tags and cleaned up ${modifiedCount} tool content files.`);
