#include <iostream>
#include <cstdio>

using namespace std;

int main(int argc, char *argv[])
{
	if(argc < 2) return 0;
	string key(argv[1]);
	
	ios::sync_with_stdio(false);
	freopen("/usr/share/dict/words", "r", stdin);
	string word;
	while(cin >> word)
	{
		if(word == key)
		{
			cout << "Word exists<br>";
			return 0;
		}
	}

	cout << "Not a word<br>";
	return 0;
}
