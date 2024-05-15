package main

import (
	"fmt"
	"generatorGo/constants"
	"generatorGo/crud"
)

func main() {
	crud.ExcelFileMain()
	return

	mainMenu()
}

func mainMenu() {
	var input string

	fmt.Println("========= Menu: ========")
	fmt.Println("=== 0. Init Git      ===")
	fmt.Println("=== 1. Init Project  ===")
	fmt.Println("=== 2. Run           ===")
	fmt.Println("=== 3. Generate CRUD ===")
	fmt.Println("=== 4. Push To Git   ===")
	fmt.Println("========================")
	_, err := fmt.Scanln(&input)
	if err != nil {
		return
	}

	if input == "1" {
		initProject()
	} else if input == "2" {
		runProject(constants.PortServer)
	} else if input == "3" {
		// crud.GenCRUD()
	} else if input == "4" {
		// git.PushToGit()
	} else if input == "0" {
		// git.InitGit()
	}
}
