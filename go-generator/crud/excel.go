package crud

import (
	"generatorGo/constants"
	"log"
	"strings"

	"github.com/tealeg/xlsx"
)

func OpenFileExcel(excelFileName string) *xlsx.File {
	xlFile, err := xlsx.OpenFile(excelFileName)
	if err != nil {
		log.Fatal(err)
		return nil
	}

	return xlFile
}

func GenerateStrModels(sheet *xlsx.Sheet) (string, map[string]int) {
	resultModels := []string{}
	relationModels := map[string]int{}
	for _, row := range sheet.Rows {
		// Iterate through each cell in the row
		rowModels := []string{}
		for _, cell := range row.Cells {
			value := cell.String()
			rowModels = append(rowModels, value)

			strRelation := GenerateStrRelation(value)
			if strRelation != "" {
				relationModels[strRelation] = 0
			}
		}

		resultModels = append(resultModels, strings.Join(rowModels, ":"))
	}

	return strings.Join(resultModels, ","), relationModels
}

func GenerateStrRelation(str string) string {
	if len(str) < 3 {
		return ""
	}

	getStrContainId := str[len(str)-3:]
	if getStrContainId == "_id" {
		return str[:len(str)-3]
	}

	return ""
}

func ExcelFileMain() {
	xlFile := OpenFileExcel(constants.ExcelFileName)

	// Iterate through each sheet
	for _, sheet := range xlFile.Sheets {
		modelsName := sheet.Name
		strModels, relationModels := GenerateStrModels(sheet)
		GenCRUD(modelsName, strModels, relationModels)
	}
}
