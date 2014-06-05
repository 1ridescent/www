#include <iostream>
#include <algorithm>
#include <fstream>
#include <vector>
#include <cmath>

using namespace std;

struct entry
{
	double id;
	string word, def;
};
vector<entry> dict;

bool cmpentry(entry a, entry b)
{
	return make_pair(a.id, make_pair(a.word, a.def)) < make_pair(b.id, make_pair(b.word, b.def));
}

int main(int argcnt, char** args)
{
	{
		ifstream fin("dict.txt");
		entry e;
		e.id = 0;
		while(getline(fin, e.word) && getline(fin, e.def))
		{
			e.id++;
			dict.push_back(e);
		}
	}

	if(argcnt < 2) return 0;
	
	string type(args[1]);
	if(type == "insert") // inserts [word] : [def]
	{
		if(argcnt < 5) return 0;
		entry input;
		bool next = false;
		for(int i = 2; i < argcnt; i++)
		{
			string s(args[i]);
			if(s == ":")
			{
				next = true;
				continue;
			}
			if(!next)
			{
				if(input.word != "") input.word += " ";
				input.word += s;
			}
			else
			{
				if(input.def != "") input.def += " ";
				input.def += s;
			}
		}
		bool found = false;
		for(int i = 0; i < dict.size(); i++)
		{
			if(dict[i].word == input.word)
			{
				dict[i].id += sqrt(dict.size());
				dict[i].def = input.def;
				found = true;
			}
		}
		if(!found)
		{
			input.id = 0;
			dict.push_back(input);
		}
	}
	else if(type == "lookup") // looks up first
	{
		if(dict.empty()) return 0;
		dict[0].id += sqrt(dict.size());
		cout << dict[0].word << " : " << dict[0].def << endl;
	}
	else if(type == "update") // updates first
	{
		if(argcnt < 3) return 0;
		entry input;
		for(int i = 2; i < argcnt; i++)
		{
			string s(args[i]);
			if(s == ":") break;
			if(input.word != "") input.word += " ";
			input.word += s;
		}
		for(int i = 0; i < dict.size(); i++)
		{
			if(dict[i].word == input.word)
			{
				dict[i].id += dict.size();
			}
		}
	}

	{
		sort(dict.begin(), dict.end(), cmpentry);
		ofstream fout("dict.txt");
		for(int i = 0; i < dict.size(); i++) fout << dict[i].word << endl << dict[i].def << endl;
	}
}
