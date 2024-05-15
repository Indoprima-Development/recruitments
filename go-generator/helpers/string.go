package helpers

import "unicode"

func CapitalizeFirstLetter(s string) string {
	if len(s) == 0 {
		return s
	}

	// Konversi string menjadi rune slice untuk menangani karakter non-ASCII dengan benar
	runes := []rune(s)
	first := runes[0]

	// Periksa apakah karakter pertama adalah huruf kecil
	if unicode.IsLetter(first) && unicode.IsLower(first) {
		runes[0] = unicode.ToUpper(first)
	}

	return string(runes)
}
