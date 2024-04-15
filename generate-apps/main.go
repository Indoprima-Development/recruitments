package main

import (
	"fmt"

	"github.com/tealeg/xlsx"
)

func OpenFile(targetFileName string) *xlsx.File {
	xlFile, err := xlsx.OpenFile(targetFileName)
	if err != nil {
		fmt.Println("Error opening file:", err)
		return nil
	}

	return xlFile
}

func OpenSheet(xlFile *xlsx.File, targetSheetName string) *xlsx.Sheet {
	// Find the sheet by name
	var targetSheet *xlsx.Sheet
	for _, sheet := range xlFile.Sheets {
		if sheet.Name == targetSheetName {
			targetSheet = sheet
			break
		}
	}

	// Check if the sheet was found
	if targetSheet == nil {
		fmt.Println("Sheet not found:", targetSheetName)
		return nil
	}

	return targetSheet
}

func main() {

}
