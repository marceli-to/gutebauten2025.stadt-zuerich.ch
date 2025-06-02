import api from '@/services/axios'

export const getVotes = async () => {
  const response = await api.get(`/votes`);
  return response.data;
};

export const getComments = async () => {
  const response = await api.get(`/comments`);
  return response.data;
};
  

