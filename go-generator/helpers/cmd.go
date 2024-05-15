package helpers

import (
	"fmt"
	"os"
	"os/exec"
	"strings"
)

func RunCmd(cm string, str []string, inputArguments []string) error {
	cmd := exec.Command(cm, str...)

	// Redirect command output
	cmd.Stdout = os.Stdout
	cmd.Stderr = os.Stderr

	// Create a pipe for command input
	stdin, err := cmd.StdinPipe()
	if err != nil {
		return fmt.Errorf("Error creating stdin pipe: %v", err)
	}

	// Start the command
	if err := cmd.Start(); err != nil {
		return fmt.Errorf("Error starting command: %v", err)
	}

	// Write input to the command's stdin
	for _, v := range inputArguments {
		fmt.Println(v)
		_, err = stdin.Write([]byte(v))
		if err != nil {
			return fmt.Errorf("Error writing to stdin: %v", err)
		}
	}

	// Close the stdin pipe
	stdin.Close()

	// Wait for the command to finish
	if err := cmd.Wait(); err != nil {
		return fmt.Errorf("Error waiting for command: %v", err)
	}

	return nil
}

func StrToCmdStr(str string) (string, []string) {
	split := strings.Split(str, " ")
	return split[0], split[1:]
}
