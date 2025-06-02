import api from '@/services/axios'

export const getVotes = async () => {
  const response = await api.get(`/votes`);
  return response.data;
};

export const getComments = async () => {
  const response = await api.get(`/comments`);
  return response.data;
};

// delete comment
export const deleteComment = async (id) => {
  const response = await api.delete(`/comments/${id}`);
  return response.data;
};

// hide comment
export const toggleComment = async (id) => {
  const response = await api.put(`/comments/${id}`);
  return response.data;
};

  

