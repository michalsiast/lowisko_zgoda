function importDataFromKupbilecikApiToSheet() {
    const apiUrl = 'https://www.kupbilecik.pl/api/?t=json&i=0&v=1.0&u=2491&token=caab134e99fc075a0a940c966dde359b';
    const sheetName = 'DANE KUPBILECIK';
  
    const response = UrlFetchApp.fetch(apiUrl);
    const data = JSON.parse(response.getContentText());
  
    const sheet = SpreadsheetApp.getActiveSpreadsheet().getSheetByName(sheetName);
    if (!sheet) {
      throw new Error(`Brak arkusza o nazwie "${sheetName}"`);
    }
  
    const rows = sheet.getDataRange().getValues();
    const headers = rows.shift();
    const idIndex = headers.indexOf('Id');
  
    // Mapuj istniejące dane wg ID
    const existingData = new Map();
    rows.forEach(row => {
      existingData.set(row[idIndex], row);
    });
  
    const today = Utilities.formatDate(new Date(), "UTC", "yyyy-MM-dd'T'HH:mm:ss'Z'");
  
    // Nadpisz istniejące lub dodaj nowe
    data.events.forEach(item => {
      const newRow = [
        item.Id,
        item.TicketsInfo?.Sold || 0,
        decodeHtmlEntities(item.Name),
        item.Date,
        item.City,
        item.Object?.Name || '',
        today
      ];
      existingData.set(item.Id, newRow); // nadpisuje lub dodaje
    });
  
    // Zapisz dane z powrotem do arkusza
    sheet.clearContents();
    sheet.appendRow(headers);
    Array.from(existingData.values()).forEach(row => sheet.appendRow(row));
  }
  
  function decodeHtmlEntities(text) {
    return text
      .replace(/&quot;/g, '"')
      .replace(/&amp;/g, '&')
      .replace(/&lt;/g, '<')
      .replace(/&gt;/g, '>')
      .replace(/&#39;/g, "'")
      .replace(/&nbsp;/g, ' ')
      .replace(/&hellip;/g, '…');
  }
  
  function dailyTrigger(){
    importDataFromKupbilecikApiToSheet();
  }