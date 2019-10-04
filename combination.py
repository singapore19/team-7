#!/usr/bin/env python
# coding: utf-8

# In[1]:


import pandas as pd

df1 = pd.read_csv('./data/geocoded_address_from.csv')
df2 = pd.read_csv('./data/geocoded_address_to.csv')


# In[4]:


df1 = df1.rename({'latitude':'from_latitude'},axis=1)
df1 = df1.rename({'longitude':'from_longitude'},axis=1)

df2= df2.rename({'latitude':'to_latitude'},axis=1)
df2 = df2.rename({'longitude':'to_longitude'},axis=1)


# In[12]:


df2['Unnamed: 0']


# In[13]:


df2 = df2.drop(df2.columns.difference(['Unnamed: 0','to_latitude','to_longitude']), 1, inplace=True)


# In[16]:


df3 = pd.merge(df1,df2,on='Unnamed: 0',how='left')


# In[17]:


df3


# In[ ]:




