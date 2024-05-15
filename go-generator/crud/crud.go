package crud

import (
	"fmt"
	"generatorGo/helpers"
	"log"
	"os"
)

var (
// 0 --> belongsTo
// 1 --> hasOne
// 2 --> hasMany
// 3 --> belongsToMany
// relations = map[string]int{
// "Material_type": 0,
// "User":      0,
// }
)

func GenCRUD(nameOfCrud string, models string, relations map[string]int) {
	fmt.Println("Loading...")

	inputArguments := []string{}
	for key, val := range relations {
		inputArguments = append(inputArguments, fmt.Sprintln("yes"))
		inputArguments = append(inputArguments, fmt.Sprintln(val))
		inputArguments = append(inputArguments, fmt.Sprintln(key))
		inputArguments = append(inputArguments, fmt.Sprintln("yes"))
	}
	inputArguments = append(inputArguments, fmt.Sprintln("no"))

	// Menjalankan perintah pertama dengan input "yes"
	if err := helpers.RunCmd("php", []string{"../artisan", "make:crud", nameOfCrud, models}, inputArguments); err != nil {
		log.Println("Error generating files:", err)
		return
	}

	// Menjalankan perintah migrasi
	if err := helpers.RunCmd("php", []string{"../artisan", "migrate"}, []string{}); err != nil {
		log.Println("Error running migration:", err)
		return
	}

	addRoute(nameOfCrud)

	fmt.Println("Generate Successful")
}

func addRoute(modelName string) {
	var (
		modelName2     = helpers.CapitalizeFirstLetter(modelName)
		controllerName = modelName2 + "Controller"
		routeName      = modelName + "s"
	)

	filePath := "../routes/web.php"
	file, err := os.OpenFile(filePath, os.O_RDWR|os.O_APPEND, 0644)
	if err != nil {
		fmt.Println("Error opening file:", err)
		return
	}
	defer file.Close()

	// Add string to the end of the file
	newString := `
    use App\Http\Controllers\` + controllerName + `;
    Route::resource('/` + routeName + `',` + controllerName + `::class);
    `
	_, err = file.WriteString(newString)
	if err != nil {
		fmt.Println("Error writing string to file:", err)
		return
	}

	fmt.Println("Route added to file successfully.")
}
