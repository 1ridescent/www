#include <iostream>
#include <cstdio>

using namespace std;

bool is_prefix(string& pref, string& word)
{
	if(pref.size() > word.size()) return false;
	for(int i = 0; i < pref.size(); i++)
		if(pref[i] != word[i])
			return false;
	return true;
}

int main(int argc, char *argv[])
{
	if(argc < 2) return 0;
	string key(argv[1]);
	
	ios::sync_with_stdio(false);
	freopen("/usr/share/dict/words", "r", stdin);
	string word;
	int cnt = 0;
	while(cin >> word)
	{
		if(is_prefix(key, word))
		{
			cout << word << "<br>";
			cnt++;
		}
		if(cnt > 10) return 0;
	}

	if(cnt == 0) cout << "Not a prefix<br>";
	return 0;
}

