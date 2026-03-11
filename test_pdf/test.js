const fs = require('fs');
const { PDFDocument } = require('pdf-lib-plus-encrypt');

async function createTestPdf() {
    const pdfDoc = await PDFDocument.create();
    const page = pdfDoc.addPage();
    page.drawText('This is a test PDF to check encryption!');
    return await pdfDoc.save();
}

async function testEncryption() {
    console.log("Creating test PDF...");
    const pdfBytes = await createTestPdf();
    
    console.log("Loading for encryption...");
    const pdfDoc = await PDFDocument.load(pdfBytes);
    
    // Using encrypt
    pdfDoc.encrypt({
        userPassword: 'open',
        ownerPassword: 'owner'
    });
    
    console.log("Saving encrypted PDF...");
    const encryptedBytes = await pdfDoc.save();
    fs.writeFileSync('test_encrypted.pdf', encryptedBytes);
    
    console.log("Done! Check test_encrypted.pdf");
}

testEncryption().catch(console.error);
